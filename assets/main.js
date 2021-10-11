const App = {
  data() {
    return {
      npsn: '', token: '',
      defaultText: 'Sinkronisasi ke Server Actudent',
      submitText: '',
      disable: false,
    }
  },
  mounted() {
    this.submitText = this.defaultText
  },
  methods: {
    exec(type) {
      this.disable = true
      this.submitText = 'Memroses data...'
      const data = {
        npsn: this.npsn,
        token: this.token
      }

      fetch(`http://localhost/dapodik_sync/get-data.php?type=${type}`, {
        method: 'POST',
        body: this.createFormData(data),
      })
        .then(response => response.json())
        .then(data => {
         console.log(data)
         this.submitText = 'Berhasil mengambil data'
         this.disable = false
        })
        .catch((error) => {
          console.error('Error:', error)
        })
    },
    createFormData(obj) {
      let formData = new FormData()
    
      for(let item in obj) {
        formData.append(item, obj[item])
      }
    
      return formData
    }
  },
  computed: {
    baseUrl() {
      return `http://localhost/dapodik`
    }
  }
}

Vue.createApp(App).mount('#ds-app')