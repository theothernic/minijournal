import suneditor from 'suneditor';
import lang from 'suneditor/src/lang';
import {en} from 'suneditor/src/lang';
import plugins from 'suneditor/src/plugins';

import '../scss/editor.scss';
import 'suneditor/dist/css/suneditor.min.css';

suneditor.create('txtEntryBody', {
    plugins: plugins,
    lang: lang.en,
    height: '15vw'
})
