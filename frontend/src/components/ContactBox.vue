<template>
  <div>
    <div
      class="ContactBox_container"
      v-for="contact in $store.state.contacts"
      :key="contact"
    >
      <div class="ContactBox_plusIcon">
        <PlusIcon />
      </div>
      <input
        name="contact[]"
        :value="contact"
        readonly
        class="ContactBox_input"
      />
      <div
        class="ContactBox_closeIcon"
        aria-label="Close Button"
        @click="removeContact(contact)"
      />
    </div>

    <div class="ContactBox_container">
      <div class="ContactBox_plusIcon">
        <PlusIcon />
      </div>
      <input
        name="contact[]"
        ref="input"
        type="text"
        class="ContactBox_input"
        placeholder="Adicionar Contato (Telefone, email, twitter, facebook)"
        @focus="onInputFocus()"
        @blur="onInputBlur()"
        @keyup.enter="addContact()"
      />
      <div
        v-if="isInputFocused"
        class="ContactBox_enterIcon"
        @click="addContact()"
      >
        <EnterIcon />
      </div>
    </div>
  </div>
</template>

<script>
import PlusIcon from "../assets/outline-cancel-24px.svg";
import EnterIcon from "../assets/round-subdirectory_arrow_left-24px.svg";

export default {
  name: "ContactBox",
  data() {
    return {
      isInputFocused: false,
    };
  },
  components: {
    PlusIcon,
    EnterIcon,
  },
  methods: {
    onInputFocus() {
      this.isInputFocused = true;
    },
    onInputBlur() {
      if (this.$refs.input.value !== "") return;
      this.isInputFocused = false;
    },
    addContact() {
      const { input } = this.$refs;
      if (input.value === "") return;
      this.$store.commit("addContact", input.value);
      this.clearInput();
    },
    removeContact(contact) {
      this.$store.commit("removeContact", contact);
    },
    clearInput() {
      this.$refs.input.value = "";
    },
  },
};
</script>

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
  color: #707070;
  &::placeholder {
    color: #cecece;
  }
}

.ContactBox_enterIcon {
  cursor: pointer;
}

.ContactBox_closeIcon {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 15px;
  height: 15px;
  padding: 1.5px;
  border-radius: 50%;
  background-color: #8d8d8d;
  cursor: pointer;
  &::before {
    position: absolute;
    content: "";
    background-color: white;
    display: flex;
    width: 12px;
    height: 2px;
    transform: rotateZ(45deg);
  }
  &::after {
    position: absolute;
    content: "";
    background-color: white;
    display: flex;
    width: 12px;
    height: 2px;
    transform: rotateZ(-45deg);
  }
}
</style>
