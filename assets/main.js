const App = {
  data() {
    return {
      npsn: '', token: '',
      domain: '', actudentToken: '',
      defaultText: 'Sinkronisasi ke Server Actudent',
      submitText: '',
      errorText: '',
      hasError: false,
      disable: false,
    }
  },
  mounted() {
    this.submitText = this.defaultText
  },
  methods: {
    getPesertaDidik() {
      this.disable = true
      this.submitText = 'Mengambil data peserta didik...'
      this.pull('PesertaDidik', data => {
        this.pushPesertaDidik(data)
      })
    },
    pushPesertaDidik(data) {
      this.submitText = `Mengirim data sejumlah ${data.results} peserta didik...`
      this.push('peserta-didik', data.rows, msg => {
        console.log('Message: ' + msg)
      })
      this.resetForm()
    },
    resetForm() {
      // this.npsn = ''
      // this.token = ''
      // this.domain = ''
      // this.actudentToken = ''
      this.disable = false
      this.submitText = this.defaultText
    },
    push(destination, data, nextTask) {
      fetch(`${this.pushUrl}${destination}`, {
        method: 'POST',
        mode: 'cors',
        body: this.createFormData({ data: JSON.stringify(data) }),
        headers: {
          Authorization: `Bearer ${this.actudentToken}`
        }
      })
        .then(response => response.json())
        .then(msg => {
          // if(msg === 'OK') nextTask(data)
        })
        .catch((error) => {
          console.error('Error:', error)
        })
    },
    pull(type, nextTask) {      
      this.hasError = false
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
          if(data.success !== undefined) {
            this.hasError = true
            this.errorText = data.message
            this.resetForm()
          } else {
            nextTask(data)            
          }
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
    pushUrl() {
      let protocol
      this.domain === 'localhost'
        ? protocol = 'http'
        : protocol = 'https'

      let basePath
      this.domain === 'localhost'
        ? basePath = 'actudent/api/public'
        : basePath = 'api/public'

      return `${protocol}://${this.domain}/${basePath}/sync/`
    }
  }
}

Vue.createApp(App).mount('#ds-app')