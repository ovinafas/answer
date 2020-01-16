<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vue - Sortable Table</title>

    <style>
        td,
        th {
            padding: 5px;
        }

        th {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div id="app">
        <table>
            <thead>
                <tr>
                    <th @click="sort('id')">Id</th>
                    <th @click="sort('name')">Name</th>
                    <th @click="sort('age')">Age</th>
                    <th @click="sort('email')">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="user in sortedUsers">
                    <td>{{user.id}}</td>
                    <td>{{user.name}}</td>
                    <td>{{user.age}}</td>
                    <td>{{user.email}}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Faker/3.1.0/faker.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <script>

        function generateUsers() {
            let users = []
          
            for (let id=1; id <= 100; id++) {
              let name = faker.name.firstName();
              let email = faker.internet.email();
              var age = faker.random.number();
          
              users.push({
                  "id": id,
                  "name": name,
                  "age": age,
                  "email": email
              });
            }
            return { "data": users }
          }
        
        
        const app = new Vue({
            el: '#app',
            data: {
                users: [],
                currentSort: 'name',
                currentSortDir: 'asc'
            },
            
            created: function () {
                this.users = generateUsers().data;
            },
            
            methods: {
                sort: function (s) {
                    if (s === this.currentSort) {
                        this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
                    }
                    this.currentSort = s;
                }
            },

            computed: {
                sortedUsers: function () {
                    return this.users.sort((a, b) => {
                        let modifier = 1;
                        if (this.currentSortDir === 'desc') modifier = -1;
                        if (a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                        if (a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                        return 0;
                    });
                }
            }
        });

    </script>
</body