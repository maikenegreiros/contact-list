<template>
  <div class="ContactBox_container">
    <div class="ContactBox_plusIcon">
      <PlusIcon />
    </div>
    <input
      class="ContactBox_input"
      type="text"
      placeholder="Adicionar Contato (Telefone, email, twitter, facebook)"
    />
  </div>
</template>

<style lang="scss" scoped>
.ContactBox_container {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 14px 17px;
  border: 1px dashed #95989a;
  box-shadow: 0 3px 8px #0000001a;
}
.ContactBox_plusIcon {
  margin-right: 40px;
}

.ContactBox_input {
  font-size: 14px;
  width: 100%;
  border: none;
  font-family: futura-book;
  outline: none;
  &::placeholder {
    color: #cecece;
  }
}
</style>

<script>
import PlusIcon from "../assets/outline-cancel-24px.svg";

export default {
  name: "ContactBox",
  components: {
    PlusIcon,
  },
};
</script>
