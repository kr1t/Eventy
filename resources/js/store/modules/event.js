import axios from 'axios'
export const state = {
  events: []
}

// getters
export const getters = {
  events: state => state.events.data,
}

// mutations
export const mutations = {
  ['fetch_events'](state, { events }) {
    state.events = events
  }
}

// actions
export const actions = {
  async fetch({ commit }) {
    const { data } = await axios.get('/api/events')
    commit('fetch_events', { events: data.items })

  }
}
