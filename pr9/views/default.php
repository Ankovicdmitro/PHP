<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="style.css">
    <title>PR9</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body>
<div class="wrap">
    <header>
        <a href="../../" class="back">Назад</a>
        <span>Практична робота №9</span>
    </header>
    
<div class="center">
<ul class=menu>
    <li><a href="/pr9">Студенты</a></li>
    <li><a href="/pr9/index.php/subjects">Предметы</a></li>
    <li><a href="/pr9/index.php/uspishnist">Успеваемость</a></li>
</ul>

<div id="app">
    <form @submit.prevent="addStudent()">
        <div class="msg" v-if="msg">{{ msg }}</div>
        <input type="text" v-model="newItem.name" placeholder="Name" required><br>
        <select v-model="newItem.group_id" v-if="groups">
            <option v-for="g in groups" :value="g.id">{{ g.name }}</option>
        </select>
        <br>
        <input type="submit" value="Добавить">
    </form>
    <table v-if="students">
        <tr>
            <th>Имя</th>
            <th>Группа</th>
            <th>Обновить</th>
            <th>Удалить</th>
        </tr>
        <tr v-for="s in students">
            <td><input v-model="s.name"></td>
            <td>
                <select v-model="s.group_id" v-if="groups">
                    <option v-for="g in groups" :value="g.id">{{g.name}}</option>
                </select>
            </td>
            <td>
                <button type="submit" name="update" @click.prevent="updateStudent(s);">Update</button>
            </td>
            <td>
                <button type="submit" name="delete" @click.prevent="deleteStudent(s);">Delete</button>
            </td>
        </tr>
    </table>
</div>
</div>
<footer>Запоріжжя 2024</footer>

</div>

<script>
    new Vue({
        el: "#app",
        data: {
            newItem: [],
            msg:"",
            students: {},
            groups: {}
        },
        mounted: function () {
            this.getData();
        },
        methods: {
            getData: function () {
                let self = this;
                axios.get("/pr9/index.php/students/getData").then(function (response) {
                    if (response.data.students) self.students = response.data.students;
                    if (response.data.groups) self.groups = response.data.groups;
                });
            },
            toFormData: function(obj){
                let fd = new FormData();
                for(let i in obj){
                    fd.append(i, obj[i]);
                }
                return fd;
            },
            addStudent: function () {
                if (this.newItem) {
                    let self = this;
                    let formData = this.toFormData(this.newItem);
                    axios.post("/pr9/index.php/students/addStudent", formData).then(function (response){
                        self.getData();
                        self.newItem = [];
                        self.msg = "Студент успешно добавлен";
                        setTimeout(function (){
                            self.msg="";
                        }, 5000);
                    })
                }
            },
            updateStudent :function (student){
                if(student){
                    let self = this;
                    let formData = this.toFormData(student);
                    formData.append('update', student.id);

                    axios.post("/pr9/index.php/students/actions", formData).then(function (){
                        self.getData();
                        self.newItem = [];
                        self.msg="Студент успешно изменен";
                        setTimeout(function (){
                            self.msg="";
                        }, 5000);
                    });
                }
            },
            deleteStudent :function (student){
                if(student){
                    let self = this;
                    let formData = this.toFormData(student);
                    formData.append('delete', student.id);

                    axios.post("/pr9/index.php/students/actions", formData).then(function (){
                        self.getData();
                        self.newItem = [];
                        self.msg="Студент успешно удален";
                        setTimeout(function (){
                            self.msg="";
                        }, 5000);
                    });
                }
            }
        }
    });
</script>
</body>

</html>