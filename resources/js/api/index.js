// Where the API handling is done
import axios from 'axios'

const API_BASE_URL =  'http://dev.ananas.mikko.af/api' // process.env.VUE_APP_API_URL || ''

// Create api for base calls
export const api = axios.create({
    baseURL: API_BASE_URL
})

