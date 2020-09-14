<template>
  <div class="InputField_container">
    <label class="InputField_label">{{ label }}</label>
    <input class="InputField_input" :type="type" :name="name">
  </div>
</template>

<style scoped>
.InputField_container {
  display: inline-block;
}
.InputField_input {
  border-radius: 20px;
  border: 1px solid #292929;
  border-radius: 8px;
  width: 259px;
  height: 40px;
}

.InputField_label {
  display: block;
  text-align: left;
  font-size: 12px;
  color: #8D8D8D;
}
</style>

<script>
export default {
  props: {
    name: String,
    label: String,
    type: {
      type: String,
      default: "text"
    }
  }
}
</script>
