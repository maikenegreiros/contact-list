<template>
  <div class="ContactForm_container">
    <h1 class="ContactForm_title">Meus contatos</h1>
    <div class="ContactForm_widthLimiter">
      <div class="ContactForm_InputsContainer">
        <div class="ContactForm_InputFieldWrapper">
          <InputField name="name" label="Nome" />
        </div>
        <div class="ContactForm_InputFieldWrapper">
          <InputField name="lastname" label="Sobrenome" />
        </div>
      </div>
      <div class="ContactForm_ContactBoxContainer">
        <ContactBox />
      </div>
    </div>
    <div class="ContactForm_ButtonsContainer">
      <FormButton text="Salvar" />
      <FormButton text="Cancelar" bgColor="transparent" color="#8D8D8D" />
    </div>
  </div>
</template>

<style lang="scss" scoped>
.ContactForm_title {
  font-family: hurme-geometric-sans, sans-serif;
  text-align: left;
  text-transform: uppercase;
  color: #1B3949;
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

export default {
  name: "ContactForm",
  components: {
    InputField,
    ContactBox,
    FormButton,
  },
};
</script>
