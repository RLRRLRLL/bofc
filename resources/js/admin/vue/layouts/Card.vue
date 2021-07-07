<template>
  <div class="card">
    <div class="card-header">
      <template v-if="title === 'Card title'">
        <slot name="card-header"></slot>
      </template>

      <template v-else>
        <h1 class="card-header__title" v-text="title"></h1>

        <!-- optional additional header element (mostly link) -->
        <div class="card-header__links">
          <slot name="link"></slot>
        </div>
      </template>
    </div>

    <div class="card-content">
      <slot></slot>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Card',
  props: {
    title: {
      type: String,
      default: 'Card title',
    },
  },
};
</script>
