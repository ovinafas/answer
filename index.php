<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://unpkg.com/vue/dist/vue.js"></script>
    <script src="https://cdn.rawgit.com/Marak/faker.js/master/examples/browser/js/faker.js"></script>

</head>
<body>

<!-- App -->
<div id="app">
  <provider :items="items"></provider>
</div>


  
  <script>
  
  window.onload=function(){
      
      const items = []
      
      for (var i = 0; i < 100; i++) {
          items.push({
            id: i,
            name: faker.name.firstName(),
            email: faker.internet.email(),
            age: faker.random.number(),
        })
      }

      Vue.component('scroller', {
          props: ['items'],
        watch: {
            items () {
              console.log('[scroller] items changed')
          },
        },
        template: `<div class="scroller">
            <div class="item" v-for="item of items">{{ item.name }}</div>
        </div>`,
      })
      
      
      Vue.component('provider', {
          props: ['items'],
        data: () => ({
            enableSort: false,
            sorting: -1,
        }),
        computed: {
            sortedItems () {
              if (this.enableSort) {
                  return this.items.slice(0).sort((a, b) => a.name < b.name ? this.sorting : -this.sorting )
               } else {
                  return this.items
            }
          },
        },
        watch: {
            sortedItems () {
              console.log('[provider] sortedItems changed')
          },
        },
        template: `<div class="provider">
            <button @click="enableSort = !enableSort">Toggle sort</button>
            <button @click="sorting *= -1">Toggle order</button>
            <scroller :items="sortedItems"></scroller>
        </div>`,
      })
      
      
      var app = new Vue({
        el: '#app',
        data: () => ({
          items,
        }),
      })
      
    }
      
  </script>

    
</body>
</html>