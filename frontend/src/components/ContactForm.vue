<template>
  <div class="ContactForm_container">
    <h1 class="ContactForm_title">Meus contatos</h1>
    <div class="ContactForm_widthLimiter">
      <div class="ContactForm_InputsContainer">
        <div class="ContactForm_InputFieldWrapper">
          <InputField name="name" label="Nome" :value="name" />
        </div>
        <div class="ContactForm_InputFieldWrapper">
          <InputField
            name="lastname"
            label="Sobrenome"
            :value="lastname"
          />
        </div>
      </div>
      <div class="ContactForm_ContactBoxContainer">
        <ContactBox />
      </div>
    </div>
    <div class="ContactForm_ButtonsContainer">
      <FormButton text="Salvar" @click.native="onSave()" />
      <FormButton
        text="Cancelar"
        bgColor="transparent"
        color="#8D8D8D"
        @click="onCancel()"
      />
    </div>
  </div>
</template>

<style lang="scss" scoped>
.ContactForm_title {
  font-family: hurme-geometric-sans, sans-serif;
  text-align: left;
  text-transform: uppercase;
  color: #1b3949;
}

.ContactForm_InputsContainer {
  display: flex;
  justify-content: space-between;
}

.ContactForm_InputFieldWrapper {
  width: 100%;
  &:first-child {
    margin-right: 7.5px;
  }
  &:last-child {
    margin-left: 7.5px;
  }
}

.ContactForm_container {
  width: 668px;
  padding: 39px 49px;
  margin: auto;
  box-shadow: 0 3px 6px #00000029;
}

.ContactForm_widthLimiter {
  max-width: 536px;
}

.ContactForm_ContactBoxContainer {
  margin: 35px 0;
}

.ContactForm_ButtonsContainer {
  text-align: left;
  margin: 52px 0;
}
</style>

<script>
import InputField from "./InputField.vue";
import ContactBox from "./ContactBox.vue";
import FormButton from "./FormButton.vue";
import { addNewContact } from "../requests/Contacts";

export default {
  name: "ContactForm",
  components: {
    InputField,
    ContactBox,
    FormButton,
  },
  computed: {
    name: {
      set(name) {
        this.$store.commit("changeName", name);
      },
      get() {
        return this.$store.state.name;
      },
    },
    lastname: {
      set(lastname) {
        this.$store.commit("changeLastName", lastname);
      },
      get() {
        return this.$store.state.lastname;
      },
    },
  },
  methods: {
    async onSave() {
      console.log("name", this.$store.state.name);
      console.log("lastname", this.$store.state.lastname);
      addNewContact(this.$store.state);
    },
    validate() {
      // const { name, lastname, contacts } = this.$store.state;
    },
    onCancel() {},
  },
};
</script>
