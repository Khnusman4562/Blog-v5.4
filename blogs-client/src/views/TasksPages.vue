<template>
  <div>
    <h1 class="page-title">List of Blogs</h1>
    <div class="action-container">
      <button @click="showCreateForm" class="create-button">Add Blogs</button>
    </div>
    <div v-if="isCreateFormVisible" class="modal">
      <div class="modal-content">
        <span @click="closeCreateForm" class="close">&times;</span>
        <TaskForm @formSubmitted="fetchTasks" :selectedTask="selectedTask" />
      </div>
    </div>
    <div class="search-container">
      <input
        style="min-width: 300px"
        v-model="searchQuery"
        @keypress.enter="searchTasks"
        id="search"
        placeholder="Search by Keyword & press Enter"
      />
      <button @click="searchTasks" class="search-button">Search</button>
    </div>
    <TaskList
      :tasks="tasks"
      @taskDeleted="fetchTasks"
      @editTask="editTask"
      @search="handleSearch"
    />
  </div>
</template>
<style scoped>
.page-title {
  text-align: center;
  color: #333;
  display: inline;
  margin: 5%;
}

.search-container {
  margin-top: 2%;
  margin-left: 5%;
  text-align: left;
  margin-bottom: 15px;
}

.action-container {
  text-align: center;
  margin-bottom: 15px;
  display: inline;
}

label {
  margin-right: 10px;
}

input {
  padding: 8px;
  margin-right: 5px;
}

.search-button,
.create-button {
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
.create-button {
  background-color: #87e590;
}

.search-button {
  background-color: #5bc0de;
}

.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 30%;
}

.close {
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover {
  color: #f00;
}
</style>
<script>
import TaskForm from "@/components/TaskForm.vue";
import TaskList from "@/components/TaskList.vue";
export default {
  components: {
    TaskForm,
    TaskList,
  },
  data() {
    return {
      tasks: [],
      unfilteredTasks: [],
      selectedTask: null,
      searchQuery: "",
      isCreateFormVisible: false,
    };
  },
  mounted() {
    this.fetchTasks();
  },
  methods: {
    async fetchTasks() {
      try {
        const response = await this.$axios.get("blogs");
        if (response.data.success) {
          this.tasks = response.data.data || [];
          this.unfilteredTasks = this.tasks;
        } else {
          console.error("Error fetching data:", response.data);
        }
      } catch (error) {
        console.error("Error fetching data:", error);
      }
    },
    editTask(task) {
      this.selectedTask = task;
      this.showCreateForm();
    },
    showCreateForm() {
      this.isCreateFormVisible = true;
    },
    closeCreateForm() {
      this.isCreateFormVisible = false;
      this.selectedTask = null;
    },
    searchTasks() {
      console.log("Search started");
      if (this.searchQuery.trim() === "") {
        this.fetchTasks();
      } else {
        console.log(this.searchQuery);
        const filteredTasks = this.unfilteredTasks.filter(
          (task) =>
            task.id.toString().includes(this.searchQuery.toLowerCase()) ||
            task.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
            task.description
              .toLowerCase()
              .includes(this.searchQuery.toLowerCase())
        );
        this.tasks = filteredTasks;
      }
      console.log("Search Ended");
    },
    handleSearch(searchQuery) {
      this.searchQuery = searchQuery;
      this.searchTasks();
    },
  },
};
</script>
