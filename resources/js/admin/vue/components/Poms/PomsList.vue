<template>
  <card title="All poms">
    <template #link>
      <a :href="`${burl.poms}/create`">
        Create

        <svg
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M12 6v6m0 0v6m0-6h6m-6 0H6"
          />
        </svg>
      </a>
    </template>

    <section class="poms">
      <figure
        v-for="pom in poms"
        :key="pom.id"
        :style="`background-image: url(${getMainImageSrc(pom)})`"
      >
        <figcaption>
          <h3>{{ pom.name }}</h3>

          <ul>
            <li>
              <span>AGE</span>
              : {{ pom.age }}
            </li>
            <li>
              <span>GENDER</span>
              : {{ pom.is_male ? 'Male' : 'Female' }}
            </li>
            <li>
              <span>FOR SALE</span>
              : {{ pom.is_for_sale ? 'Yes' : 'No' }}
            </li>
          </ul>
        </figcaption>
      </figure>
    </section>
  </card>
</template>

<script>
import Card from './../../layouts/Card.vue';

export default {
  name: 'PomsList',
  components: {
    Card,
  },
  inject: ['burl'],
  props: {
    poms: {
      type: Array,
      default: () => [],
    },
  },
  mounted() {
    console.log(this.poms);
  },
  methods: {
    getMainImageSrc(pom) {
      if (pom.images.length) {
        for (let i = 0; i < pom.images.length; i++) {
          const image = pom.images[i];

          return image.is_main ? image.url : pom.images[0].url;
        }
      }
    },
  },
};
</script>

<style lang="scss" scoped></style>
