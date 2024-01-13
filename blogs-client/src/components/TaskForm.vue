<template>
  <form @submit.prevent="submitForm" class="task-form">
    <label for="title">Title:</label>
    <input v-model="task.title" id="title" required />
    <label for="description">Description:</label>
    <textarea v-model="task.description" id="description"></textarea>
    <button type="submit" class="submit-button">
      {{ isEditing ? "Update" : "Submit" }}
    </button>
  </form>
</template>
<style scoped>
.task-form {
  max-width: 400px;
  margin: 20px auto;
}
label {
  display: block;
  margin-bottom: 5px;
}
input,
textarea {
  width: 100%;
  padding: 8px;
  margin-bottom: 10px;
}
.submit-button {
  background-color: #5cb85c;
  color: #fff;
  padding: 10px;
  cursor: pointer;
  border: none;
}
.submit-button:hover {
  background-color: #4cae4c;
}
</style>
<script>
export default {
  data() {
    return {
      task: {
        title: "",
        description: "",
      },
      isEditing: false,
    };
  },
  methods: {
    async submitForm() {
      try {
        if (this.isEditing) {
          await this.$axios.put(`blogs/${this.task.id}`, this.task);
        } else {
          await this.$axios.post("blogs", this.task);
        }
        this.$emit("formSubmitted");
        this.resetForm();
      } catch (error) {
        console.error("Error saving task:", error);
      }
    },
    resetForm() {
      this.task = { title: "", description: "" };
      this.isEditing = false;
    },
  },
  watch: {
    selectedTask: {
      handler(newTask) {
        if (newTask) {
          this.task = { ...newTask };
          this.isEditing = true;
        }
      },
      immediate: true,
    },
  },
  props: ["selectedTask"],
};
</script>
