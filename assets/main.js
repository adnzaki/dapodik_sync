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
      opsiPd: ''
    }
  },
  mounted() {
    this.submitText = this.defaultText
    this.opsiPd = $('input[name=opsiPd]').val()
    
    let obj = this
    $('input[name=opsiPd]').change(function() {
      obj.opsiPd = this.value
    })
  },
  methods: {
    getPesertaDidik() {
      if(this.npsn !== '' 
      && this.token !== '' 
      && this.domain !== '' 
      && this.actudentToken !== '') {
        this.hasError = false
        this.errorText = ''
        this.successText = []
        this.syncSuccess = false
        this.disable = true
        this.submitText = 'Mengambil data peserta didik...'
        this.pull('PesertaDidik', data => {
          this.submitText = `Mengirim data peserta didik...`
          console.log(this.opsiPd)
          this.push('peserta-didik', data.rows, res => {
            this.successText.push(res.note)
            this.getGtk()            
          })
        })        
      } else {
        this.hasError = true
        this.errorText = 'Semua form isian wajib diisi!'
      }
    },
    getGtk() {
      this.submitText = 'Mengambil data guru dan tenaga kependidikan...'
      this.pull('Gtk', data => {
        this.submitText = `Mengirim data guru dan tenaga kependidikan...`
        this.push('gtk', data.rows, res => {
          this.successText.push(res.note)
          if(this.opsiPd !== 'pindahan') {
            this.getRombel()
          } else {
            this.successText.push('Tidak ada penarikan data rombongan belajar untuk peserta didik pindahan')
            this.resetForm()
            $('#successModal').modal('show')
          }
        })
      })
    },
    getRombel() {
      this.submitText = 'Mengambil data rombongan belajar...'
      this.pull('RombonganBelajar', data => {
        this.submitText = `Mengirim data rombongan belajar...`
        this.push('rombel', data.rows, res => {
          this.successText.push(res.note)
          this.setAnggotaRombel()
        })
      })
    },
    setAnggotaRombel() {
      this.submitText = 'Memetakan anggota rombongan belajar...'
      this.push('set-anggota-rombel', {}, res => {
        this.resetForm()
        $('#successModal').modal('show')
      })
    },
    resetForm() {
      this.disable = false
      this.submitText = this.defaultText      
    },
    push(destination, data, nextTask) {
      fetch(`${this.pushUrl}${destination}`, {
        method: 'POST',
        mode: 'cors',
        body: this.createFormData({ 
          data: JSON.stringify(data),
          option: this.opsiPd
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
