import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [react()],
  /* root:'./tuto', */
  //base:'',
  build: {
    manifest:true,
    rollupOptions: {

      /* input:['./tailwind/index.css','./tailwind/index.html'], */
      /* input:['./tuto'], */

    },
    copyPublicDir:false
  }  
})
