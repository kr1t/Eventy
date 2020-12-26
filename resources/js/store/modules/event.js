import axios from 'axios'
export const state = {
  events: [],
  event: {}
}

// getters
export const getters = {
  events: state => state.events.data,
  event: state => state.event,

}

// mutations
export const mutations = {
  ['fetch_events'](state, { events }) {
    state.events = events
  },
  ['fetch_events_show'](state, { event }) {
    state.event = event
  }
}

// actions
export const actions = {
  async fetch({ commit }) {
    const { data } = await axios.get('/api/events')
    commit('fetch_events', { events: data.items })

  },
  async show({ commit }, id) {
    const { data } = await axios.get(`/api/events/${id}`)
    commit('fetch_events_show', { event: data.item })

  }
}
