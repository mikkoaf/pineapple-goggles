// Where the API handling is done
import axios from 'axios'
import store from '../store'

const API_BASE_URL = process.env.VUE_APP_API_URL || ''

// Create api for base calls
export const api = axios.create({
    baseURL: API_BASE_URL
})

