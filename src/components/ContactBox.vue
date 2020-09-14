<template>
  <div class="ContactBox_container">
    <div class="ContactBox_plusIcon">
      <PlusIcon />
    </div>
    <p class="ContactBox_placeholder">Adicionar Contato (Telefone, email, twitter, facebook)</p>
  </div>
</template>

<style scoped>
.ContactBox_container {
  display: flex;
  justify-content: flex-start;
  align-items: center;
  padding: 14px 17px;
  border: 1px dashed #95989A;
  box-shadow: 0 3px 8px #0000001A;
}
.ContactBox_plusIcon {
  margin-right: 40px;
}
.ContactBox_placeholder {
  font-size: 14px;
  color: #CECECE;
}
</style>

<script>
import PlusIcon from "../assets/outline-cancel-24px.svg"

export default {
  name: "ContactBox",
  components: {
    PlusIcon,
  }
};
</script>
