<template>
  <div id="wrapper">
    <!-- spinner -->
    <div id="spinner">
      <div></div>
    </div>

    <card>
      <template #card-header>
        <!-- form stepper -->
        <div class="stepper">
          <ul class="stepper-items">
            <li v-for="(section, idx) in sections" :key="idx">
              <div
                class="stepper-section"
                :class="{
                  active: section.active,
                  done: section.done && !section.active,
                }"
              >
                <h1 v-text="section.title"></h1>
                <svg
                  v-if="section.done && !section.active"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 1024 1024"
                >
                  <path
                    d="M912 190h-69.9c-9.8 0-19.1 4.5-25.1 12.2L404.7 724.5L207 474a32 32 0 0 0-25.1-12.2H112c-6.7 0-10.4 7.7-6.3 12.9l273.9 347c12.8 16.2 37.4 16.2 50.3 0l488.4-618.9c4.1-5.1.4-12.8-6.3-12.8z"
                    fill="currentColor"
                  />
                </svg>
              </div>
              <span v-if="idx !== sections.length - 1"></span>
            </li>
          </ul>
        </div>
      </template>

      <!-- form section component -->
      <keep-alive>
        <component
          :is="currentSection"
          @info-ready="saveInfo"
          @images-ready="saveImages"
          @run-spinner="runSpinner"
        ></component>
      </keep-alive>
    </card>
  </div>
</template>

<script>
import axios from 'axios';
import Card from './../../layouts/Card.vue';
import InfoForm from './Create/InfoForm.vue';
import ImagesForm from './Create/ImagesForm.vue';

export default {
  name: 'CreatePom',
  components: {
    Card,
    InfoForm,
    ImagesForm,
  },
  provide() {
    return {
      csrf: this.csrf,
    };
  },
  inject: ['burl'],
  props: {
    csrf: {
      type: String,
      default: '',
    },
  },
  data() {
    return {
      // Form sections
      sections: [
        {
          title: 'Info',
          componentName: 'InfoForm',
          active: true,
          done: false,
        },
        {
          title: 'Images',
          componentName: 'ImagesForm',
          active: false,
          done: false,
        },
      ],
      formData: {
        info: {},
        images: {},
      },
      errors: null,
    };
  },
  computed: {
    currentSection() {
      let kebabCaseActiveComponent;

      this.sections.forEach((section) => {
        if (!section.active) return;

        if (section.active) {
          const activeComponent = section.componentName;

          if (activeComponent === 'InfoForm')
            kebabCaseActiveComponent = 'info-form';
          if (activeComponent === 'ImagesForm')
            kebabCaseActiveComponent = 'images-form';
        }
      });

      return kebabCaseActiveComponent;
    },
  },
  watch: {
    // check if info & images are filled
    formData: {
      handler(newValue) {
        if (
          Object.keys(newValue.info).length &&
          Object.keys(newValue.images).length
        ) {
          this.storePomData();
        }
      },
      deep: true,
    },
  },
  methods: {
    saveInfo(info) {
      // save form data
      this.formData.info = info;

      // update section values
      this.sections[0].active = false;
      this.sections[0].done = true;
      this.sections[1].active = true;
    },

    saveImages(images) {
      // save form data
      this.formData.images = images;

      // update section values
      this.sections[1].active = false;
      this.sections[1].done = true;
    },

    runSpinner() {
      document.getElementById('spinner').classList.add('show');
    },

    stopSpinner() {
      document.getElementById('spinner').classList.remove('show');
    },

    storePomData() {
      /**
       * Create pom model
       */
      const pomInfo = JSON.stringify(this.formData.info);
      const headers = {
        info: {
          'Content-Type': 'application/json',
        },
        files: {
          'Content-Type': 'multipart/form-data',
        },
      };

      axios
        .post(`${this.burl.poms}/store-info`, pomInfo, {
          headers: headers.info,
        })
        .then((res) => {
          // get pom ID then pass it to storeImage controller,
          // for relationships purposes
          const pomID = res.data;

          // init formData instance
          const formData = new FormData();

          // append images
          for (let i = 0; i < this.formData.images.length; i++) {
            formData.append('image[]', this.formData.images[i]);
          }

          formData.append('id', pomID);

          axios
            .post(`${this.burl.poms}/store-images`, formData, {
              headers: headers.files,
            })
            .then((r) => {
              const message = r.data.message;
              const pomID = r.data.id;

              this.stopSpinner();

              document.location.replace(`${this.burl.poms}/show/${pomID}`);
            })
            .catch((err) => {
              console.error(err);
            });
        })
        .catch((err) => console.error(err));
    },
  },
};
</script>

<style scoped lang="scss">
#wrapper {
  margin-top: 1rem;
}
</style>
