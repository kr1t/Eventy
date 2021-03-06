import axios from 'axios'
export const state = {
  events: [],
  eventsrans: [],
  event: {}
}

// getters
export const getters = {
  events: state => state.events.data,
  eventsrans: state => state.eventsrans.data,

  event: state => state.event.item,
  recents: state => state.event.recents,

}

// mutations
export const mutations = {
  ['fetch_events'](state, { events, eventsrans }) {
    state.events = events
    state.eventsrans = eventsrans

  },
  ['fetch_events_show'](state, { event }) {
    state.event = event
  }
}

// actions
export const actions = {
  async fetch({ commit }) {
    const { data } = await axios.get('/api/events')
    commit('fetch_events', { events: data.items, eventsrans: data.eventsrans })

  },
  async show({ commit }, id) {
    const { data } = await axios.get(`/api/events/${id}`)
    commit('fetch_events_show', { event: data })

  }
}
