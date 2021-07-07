<template>
  <div id="image-form">
    <button class="btn btn-cta" @click="$refs.fileInput.click()">
      Upload Images
    </button>

    <!-- images preview -->
    <div class="images-preview">
      <figure
        v-for="(image, idx) in getImageUrls"
        :key="idx"
        class="images-preview__item"
      >
        <img class="images-preview__image" :src="image" alt="" />

        <div class="images-preview__opts">
          <button
            class="images-preview__cancel"
            title="Cancel Image"
            @click="cancelImage(idx)"
          >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
              <g fill="currentColor">
                <path
                  d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293L5.354 4.646z"
                />
              </g>
            </svg>
          </button>
        </div>
      </figure>
    </div>

    <!-- form -->
    <form enctype="multipart/form-data" @submit.prevent="saveImages">
      <input type="hidden" name="_token" :value="csrf" />

      <input
        ref="fileInput"
        type="file"
        multiple
        class="hidden"
        @change="getImages"
      />

      <button class="btn btn-next" @click="runSpinner">Save</button>
    </form>
  </div>
</template>

<script>
export default {
  name: 'ImagesForm',
  inject: ['csrf'],
  emits: ['images-ready', 'run-spinner'],
  data() {
    return {
      images: [],
    };
  },
  computed: {
    getImageUrls() {
      const urls = [];

      if (this.images.length) {
        this.images.forEach((image) => {
          urls.push(URL.createObjectURL(image));
        });
      }

      return urls;
    },
  },
  methods: {
    cancelImage(idx) {
      this.images.splice(idx, 1);
    },

    getImages(e) {
      this.images.push(...e.target.files);
    },

    saveImages() {
      this.$emit('images-ready', this.images);
    },

    runSpinner() {
      this.$emit('run-spinner');
    },
  },
};
</script>

<style lang="scss" scoped></style>
