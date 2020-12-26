import axios from 'axios'
export const state = {
  purchases: [],
}

// getters
export const getters = {
  purchases: state => state.purchases,

}

// mutations
export const mutations = {
  ['fetch_purchase'](state, { purchases }) {
    state.purchases = purchases
  },

}

// actions
export const actions = {
  async fetch({ commit }) {
    const { data } = await axios.get('/api/purchases')
    commit('fetch_purchase', { purchases: data.purchases })
  },

}
