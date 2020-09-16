<template>
  <div id="app">
    <ContactForm />
  </div>
</template>

<script>
import ContactForm from "./components/ContactForm.vue";

export default {
  name: "App",
  components: {
    ContactForm,
  },
};
</script>

<style>
@font-face {
  font-family: "hurme-geometric-sans";
  src: url(./assets/fonts/hurme-geometric-sans-3/471a8cf5be29aa662f525c3b132187d7.eot);
  src: url(./assets/fonts/hurme-geometric-sans-3/471a8cf5be29aa662f525c3b132187d7.eot?#iefix) format("embedded-opentype"),
    url(./assets/fonts/hurme-geometric-sans-3/471a8cf5be29aa662f525c3b132187d7.woff2) format("woff2"),
    url(./assets/fonts/hurme-geometric-sans-3/471a8cf5be29aa662f525c3b132187d7.woff) format("woff"),
    url(./assets/fonts/hurme-geometric-sans-3/471a8cf5be29aa662f525c3b132187d7.ttf) format("truetype");
}

@font-face {
  font-family: "futura-book";
  src: url(./assets/fonts/futura-book/futura-book.ttf) format("truetype");
}

#app {
  display: flex;
  align-items: center;
  min-height: 100vh;
  font-family: futura-book;
}
</style>
