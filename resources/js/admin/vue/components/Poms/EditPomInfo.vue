<template>
  <div></div>
</template>

<script>
export default {
  name: 'EditPomInfo',
  props: {
    formData: {
      type: Object,
      default: () => {},
    },
  },
  data() {
    return {
      pom: {},
    };
  },
  mounted() {
    console.log(this.pom, this.formData);
  },
};
</script>

<style lang="scss" scoped></style>
