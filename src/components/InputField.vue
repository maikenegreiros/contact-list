<template>
  <div class="InputField_container">
    <label class="InputField_label">{{ label }}</label>
    <input class="InputField_input" :type="type" :name="name" />
  </div>
</template>

<style scoped>
.InputField_container {
  display: inline-block;
}

.InputField_input {
  padding: 12px 18px;
  margin-top: 8px;
  font-size: 14px;
  border: 1px solid #292929;
  border-radius: 8px;
}

.InputField_label {
  display: block;
  text-align: left;
  font-family: futura-book;
  font-size: 12px;
  color: #8d8d8d;
}
</style>

<script>
export default {
  props: {
    name: String,
    label: String,
    type: {
      type: String,
      default: "text",
    },
  },
};
</script>
