import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    name: String(),
    lastname: String(),
    contacts: Array<String>(),
  },
  getters: {},
  mutations: {
    changeName(state, payload) {
      state.name = payload;
    },
    changeLastName(state, payload) {
      state.lastname = payload;
    },
    addContact(state, payload: string) {
      state.contacts.push(payload);
    },
    removeContact(state, payload) {
      state.contacts = state.contacts.filter((contact) => contact !== payload);
    },
    clear(state) {
      state.name = ''
      state.lastname = ''
      state.contacts = []
    },
  },
  actions: {},
});
