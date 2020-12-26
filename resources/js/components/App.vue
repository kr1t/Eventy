<template>
  <div id="app">
    <loading ref="loading" />

    <transition name="page" mode="out-in">
      <component :is="layout" v-if="layout" />
    </transition>
  </div>
</template>

<script>
import Loading from "./Loading";

// Load layout components dynamically.
const requireContext = require.context("~/layouts", false, /.*\.vue$/);

const layouts = requireContext
  .keys()
  .map((file) => [file.replace(/(^.\/)|(\.vue$)/g, ""), requireContext(file)])
  .reduce((components, [name, component]) => {
    components[name] = component.default || component;
    return components;
  }, {});

export default {
  el: "#app",

  components: {
    Loading,
  },

  data: () => ({
    layout: null,
    defaultLayout: "default",
  }),

  metaInfo() {
    const { appName } = window.config;

    return {
      title: appName,
      // titleTemplate: `%s · ${appName}`
    };
  },

  mounted() {
    this.$loading = this.$refs.loading;
  },

  methods: {
    /**
     * Set the application layout.
     *
     * @param {String} layout
     */
    setLayout(layout) {
      if (!layout || !layouts[layout]) {
        layout = this.defaultLayout;
      }

      this.layout = layouts[layout];
    },
  },
};
</script>

<style>
 @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css');
  .content-menuUser{
    width: calc(100% - 70px);
    margin-left: 60px;
    padding: 1.5rem 15px;
  }
  @media (min-width: 992px){
    .content-menuUser{
      width: calc(100% - 260px);
      margin-left: 260px;
    }
  }
</style>
