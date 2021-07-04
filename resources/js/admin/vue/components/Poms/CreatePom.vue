<template>
  <div id="wrapper">
    <!-- <AlertContainer /> -->
    <div class="card">
      <div class="card--header">
        <!-- form stepper -->
        <div class="stepper">
          <ul class="stepper-items">
            <li v-for="(section, idx) in sections" :key="idx">
              <h1
                :class="{ active: section.active, done: section.done }"
                v-text="section.title"
              ></h1>
              <span v-if="idx !== sections.length - 1"></span>
            </li>
          </ul>
        </div>
      </div>

      <div class="card--content">
        <component
          :is="currentSection"
          v-bind="formData"
          @info-ready="saveInfo"
          @images-ready="saveImages"
        ></component>
        <!-- <info-form /> -->
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import InfoForm from './Create/InfoForm.vue';
import ImagesForm from './Create/ImagesForm.vue';
import EditPomInfo from './EditPomInfo.vue';

export default {
  name: 'CreatePom',
  components: {
    InfoForm,
    ImagesForm,
    EditPomInfo,
  },
  provide() {
    return {
      csrf: this.csrf,
    };
  },
  props: {
    csrf: String,
  },
  data() {
    return {
      // Form sections
      sections: [
        {
          title: 'Info',
          component: 'InfoForm',
          active: true,
          done: false,
        },
        {
          title: 'Images',
          component: 'ImagesForm',
          active: false,
          done: false,
        },
        {
          title: 'Preview',
          component: 'EditPomInfo',
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
      const comp = this.sections.filter((section) => section.active)[0]
        .component;
      let compKebabCase = '';

      if (comp === 'InfoForm') compKebabCase = 'info-form';
      if (comp === 'ImagesForm') compKebabCase = 'images-form';
      if (comp === 'EditPomInfo') compKebabCase = 'edit-pom-form';

      return compKebabCase;
    },
    createdPomData() {
      if (this.currentSection === 'edit-pom-form') {
        return this.formData;
      }

      return {};
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
      this.sections[2].active = true;
    },

    storePomData() {
      /**
       * Create pom model
       */
      const stringified = JSON.stringify(this.formData.info);

      axios
        .post('/12a5155wo298d1u3d1j0/store-pom-info', stringified, {
          headers: {
            'Content-Type': 'application/json',
          },
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
            .post('/12a5155wo298d1u3d1j0/store-pom-images', formData, {
              headers: {
                'Content-Type': 'multipart/form-data',
              },
            })
            .then((r) => {
              console.log(r.data);
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
