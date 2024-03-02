# How to Create a Vue 3 PWA with Vite

The combination of Vite, Vue 3, and Progressive Web Apps (PWAs) hasn't been widely explored by developers, especially those who write documentation. It's a relatively new area, so the process to create a Vue 3 PWA with Vite, which also builds and runs on XXAMP, was a whole new frontier. But I am nothing if not a pioneer

## Initializing the Project
Most documentation points to PWAs being built in Vue 2 or using vue-cli. Both are old now. Vite is the new tooling but there is some shimmy sham you can do to get a PWA working in Vite + Vue 3.

Initialize the project like so:

```bash
npm create vue@latest
```

Pick all the options you like.

```bash
cd your-app
npm install
```

Now you're in your app directory installing the basic Vue packages.

After thats done, install the vite-pwa plugin like so:

```bash
npm i vite-plugin-pwa
```

Inside of the `vite.config.js` file in your project, make sure it looks like this, especially importing the VitePWA and assigning the associated plugin:

```javascript
import { fileURLToPath, URL } from 'node:url'

import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import vueJsx from '@vitejs/plugin-vue-jsx'
import { VitePWA } from 'vite-plugin-pwa'

// https://vitejs.dev/config/
export default defineConfig({
  plugins: [
    vue(),
    vueJsx(),
    VitePWA({
      registerType: 'autoUpdate',
      injectRegister: 'auto',
    }),
  ],
  resolve: {
    alias: {
      '@': fileURLToPath(new URL('./src', import.meta.url))
    }
  }
})
```

Then run `npm run build` to create your app in the `dist/` folder.

## Running the Build from XAMPP

A deployed PWA needs to be deployed at the exact root of the web server. This is because there is source-mapping going on behind the scenes in the build that makes that assumption. There are ways to adjust this mapping, but I am lazy. The `htdocs` folder in XAMPP IS the root folder of an Apache web server. So if you delete everything out of that, and paste the contents of your `dist` folder into the `htdocs` folder, you can run the web app that way. You can still have an API running out of an `htdocs/api/` folder in there if you want. Note that visiting your API endpoints in the browser won't work, since it will think you're accessing a weird app view, but fetch requests and curl requests still work.

## Installing the PWA

Once you clear your cache, and run from localhost, you will see the app! If you serve to the network, you can do the same by visiting the site from your phone. To install (in Edge on a computer) go to the three dots menu in the browser, hover over Apps > and you should see an Install App button! Some browsers are better at detecting PWAs in general, and if we want to fine-tune our manifest file to make all browsers like us, we can.

## THE IMPORTANT BIT

You don't need to do any of this to see the app and work on it while developing. This is a release process. To view the app in development, just use:

```bash
npm run dev
```
