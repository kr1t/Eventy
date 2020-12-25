import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'

import '~/plugins'
import '~/components'


Vue.config.productionTip = false

import "./assets/app.css";
import "./assets/menu.css";
import "./assets/card.css";
import "./assets/search.css";
import "./assets/tabsView.css";
import "./assets/checkbox.css";
import "./assets/login.css";
import "./assets/testjaa.css";

/* eslint-disable no-new */
new Vue({
  i18n,
  store,
  router,
  ...App
})
