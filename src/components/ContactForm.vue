<template>
  <div>
    <InputField name="name" label="Nome" />
    <InputField name="lastname" label="Sobrenome" />
    <div>
      <ContactBox />
    </div>
  </div>
</template>

<script>
import InputField from "./InputField.vue";
import ContactBox from "./ContactBox.vue";

export default {
  name: "ContactForm",
  components: {
    InputField,
    ContactBox
  },
};
</script>
