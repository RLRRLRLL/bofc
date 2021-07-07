<template>
  <card :title="pom.name" class="no-padding">
    <template #link>
      <a :href="`${burl.poms}/create`">
        Create another one

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

      <button class="btn-success">Save</button>
    </template>

    <div>
      <!-- Tabs -->
      <div class="tabs">
        <button class="tabs-btn active" @click="currentTab = 'info'">
          Info
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <g fill="currentColor">
              <path
                d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
              />
              <path
                d="M8.93 6.588l-2.29.287l-.082.38l.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319c.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246c-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0z"
              />
            </g>
          </svg>
        </button>
        <button class="tabs-btn" @click="currentTab = 'images'">
          Images
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 16">
            <path
              d="M17 2h-1V1c0-.55-.45-1-1-1H1C.45 0 0 .45 0 1v12c0 .55.45 1 1 1h1v1c0 .55.45 1 1 1h14c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zM2 3v10h-.998L1 12.998V1.002L1.002 1h13.996l.002.002V2H3c-.55 0-1 .45-1 1zm15 11.998l-.002.002H3.002L3 14.998V3.002L3.002 3h13.996l.002.002v11.996z"
              fill="currentColor"
            />
            <path
              d="M15 5.5a1.5 1.5 0 1 1-3.001-.001A1.5 1.5 0 0 1 15 5.5z"
              fill="currentColor"
            />
            <path d="M16 14H4v-2l3.5-6l4 5h1L16 8z" fill="currentColor" />
          </svg>
        </button>
      </div>

      <!-- Tab content -->
      <component :is="currentTab" :pom="pom"></component>
    </div>
  </card>
</template>

<script>
import Card from './../../layouts/Card.vue';
import ShowInfo from './Show/ShowInfo.vue';
import ShowImages from './Show/ShowImages.vue';

export default {
  name: 'ShowPom',
  components: {
    Card,
    ShowInfo,
    ShowImages,
  },
  inject: ['burl'],
  props: {
    pom: {
      type: Object,
      default: () => ({}),
    },
  },
  data() {
    return {
      currentTab: 'ShowInfo',
    };
  },
  computed: {
    activeTab() {
      let activeComponent;

      if (this.currentTab === 'info') {
        activeComponent = 'ShowInfo';
      }

      if (this.currentTab === 'images') {
        activeComponent = 'ShowImages';
      }

      return activeComponent;
    },
  },
  mounted() {
    console.log(this.pom);
  },
};
</script>
