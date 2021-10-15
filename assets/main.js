const App = {
  data() {
    return {
      npsn: '', token: '',
      domain: '', actudentToken: '',
      defaultText: 'Kirim ke Server Actudent',
      submitText: '',
      errorText: '',
      successText: [],
      hasError: false,
      syncSuccess: false,
      disable: false,
    }
  },
  mounted() {
    this.submitText = this.defaultText
  },
  methods: {
    getPesertaDidik() {
      this.successText = []
      this.syncSuccess = false
      this.disable = true
      this.submitText = 'Mengambil data peserta didik...'
      this.pull('PesertaDidik', data => {
        this.submitText = `Mengirim data peserta didik...`
        this.push('peserta-didik', data.rows, res => {
          this.successText.push(res.note)
          this.getGtk()            
        }, true)
      })
    },
    getGtk() {
      this.submitText = 'Mengambil data guru dan tenaga kependidikan...'
      this.pull('Gtk', data => {
        // this.submitText = `Mengirim data sejumlah ${data.results} GTK...`
        this.submitText = `Mengirim data guru dan tenaga kependidikan...`
        this.push('gtk', data.rows, res => {
          this.successText.push(res.note)
          this.resetForm()
        })
      })
    },
    resetForm() {
      this.disable = false
      this.submitText = this.defaultText
      $('#successModal').modal('show')
    },
    push(destination, data, nextTask, isStudent = false) {
      const opsiPd1 = document.getElementById('opsiPd1')
      const opsiPd2 = document.getElementById('opsiPd2')
      let selectedOption = null
      if(isStudent) {
        opsiPd1.checked ? selectedOption = opsiPd1.value : selectedOption = opsiPd2.value
      } 
      
      fetch(`${this.pushUrl}${destination}`, {
        method: 'POST',
        mode: 'cors',
        body: this.createFormData({ 
          data: JSON.stringify(data),
          option: selectedOption
        }),
        headers: {
          Authorization: `Bearer ${this.actudentToken}`
        }
      })
        .then(response => response.json())
        .then(data => {
          nextTask(data)
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

      fetch(`${this.appHost}/dapodik_sync/get-data.php?type=${type}`, {
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
    appHost() {
      return `http://${window.location.host}`
    },
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
