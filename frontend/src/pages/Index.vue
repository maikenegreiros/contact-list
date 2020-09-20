<template>
  <q-page class="flex flex-center">
    <!-- <h1>Olá</h1> -->
    <ContactForm />
  </q-page>
</template>

<script>
import ContactForm from "../components/ContactForm"

export default {
  name: "PageIndex",
  components: {
    ContactForm
  }
}
</script>
