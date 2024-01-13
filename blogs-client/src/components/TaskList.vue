<template>
  <div class="table-body">
    <table class="task-table">
      <thead>
        <tr>
          <th>Id</th>
          <th>Title</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="task in filteredTasks" :key="task.id">
          <td>{{ task.id }}</td>
          <td>{{ task.title }}</td>
          <td>{{ task.description }}</td>
          <td>
            <button @click="confirmDeleteTask(task.id)" class="delete-button">
              Delete
            </button>
            <button @click="editTask(task)" class="edit-button">Edit</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
<style scoped>
.table-body {
  margin-left: 5%;
  margin-right: 14%;
}
.task-table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 15px;
  font-family: "Arial", sans-serif;
}
.task-table th,
.task-table td {
  border: 1px solid #ddd;
  padding: 12px;
  text-align: left;
}
.task-table th {
  background-color: #f2f2f2;
}
.task-table td {
  background-color: #fff;
}
.delete-button,
.edit-button {
  padding: 8px;
  cursor: pointer;
  border: none;
  color: #fff;
  font-weight: bold;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 14px;
  transition-duration: 0.4s;
  margin: 4px 2px;
  border-radius: 4px;
}
.delete-button {
  background-color: #d9534f;
}
.edit-button {
  background-color: #5bc0de;
}
.delete-button:hover,
.edit-button:hover {
  background-color: #555;
  color: #fff;
}
</style>
<script>
export default {
  props: ["tasks"],
  data() {
    return {
      searchQuery: "",
    };
  },
  computed: {
    filteredTasks() {
      return this.tasks.filter(
        (task) =>
          task.id.toString().includes(this.searchQuery.toLowerCase()) ||
          task.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
          task.description
            .toLowerCase()
            .includes(this.searchQuery.toLowerCase())
      );
    },
  },
  methods: {
    async confirmDeleteTask(taskId) {
      if (window.confirm("Are you sure you want to delete this task?")) {
        this.deleteTask(taskId);
      }
    },
    async deleteTask(taskId) {
      try {
        await this.$axios.delete(`blogs/${taskId}`);
        this.$emit("taskDeleted");
      } catch (error) {
        console.error("Error deleting task:", error);
      }
    },
    editTask(task) {
      this.$emit("editTask", task);
    },
    searchTasks() {
      this.$emit("search", this.searchQuery);
    },
  },
};
</script>
