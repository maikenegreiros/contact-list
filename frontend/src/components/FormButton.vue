<template>
  <button :style="cssVars" type="button" class="FormButton_buttonElement">
    {{ text }}
  </button>
</template>

<style scoped>
.FormButton_buttonElement {
  font-family: futura-book;
  font-size: 18px;
  padding: 10px 60px;
  border-radius: 35px;
  border: none;
  background-color: var(--bg-color);
  color: var(--color);
  cursor: pointer;
}
</style>
<script>
export default {
  name: "FormButton",
  props: {
    text: String,
    bgColor: {
      type: String,
      default: "#ffa700",
    },
    color: {
      type: String,
      default: "#fff",
    },
  },
  computed: {
    cssVars() {
      return {
        "--bg-color": this.bgColor,
        "--color": this.color,
      };
    },
  },
};
</script>
