const editor = grapesjs.init({
    // Indicate where to init the editor. You can also pass an HTMLElement
    container: '#gjs',
    // Get the content for the canvas directly from the element
    // As an alternative we could use: `components: '<h1>Hello World Component!</h1>'`,
    fromElement: false,
    // Size of the editor
    height: '100%',
    width: 'auto',
    protectedCss: '.gjs-cell { vertical-align: top; }',
    // Disable the storage manager for the moment
    storageManager: false,
    // Avoid any default panel
    panels: { defaults: [] },
    plugins: ["gjs-blocks-basic"],
    pluginsOpts: {
        "gjs-blocks-basic": {
            blocks: ["column1", "column2", "column3", "column3-7", "text", "link"],
            stylePrefix: 'gjs-',
            labelColumn1: "1 Column",
            labelColumn2: "2 Column",
            labelColumn3: "3 Column",
            labelColumn37: "2 Column 3/7",
            labelText: "Text",
            labelLink: "Link",
            category: "Basic"
        }
    },
    blockManager: {
        appendTo: ".blocks-container",
        blocks: [
            {
                id: 'image',
                label: 'Image',
                media: `<svg style="width:24px;height:24px" viewBox="0 0 24 24">
                  <path d="M8.5,13.5L11,16.5L14.5,12L19,18H5M21,19V5C21,3.89 20.1,3 19,3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19Z" />
              </svg>`,
                // Use `image` component
                content: { type: 'image' },
                // The component `image` is activatable (shows the Asset Manager).
                // We want to activate it once dropped in the canvas.
                activate: true,
                // select: true, // Default with `activate: true`
                category: "Content"
            }, {
                id: 'product list',
                label: 'Product List',
                media: `<i class="bi bi-view-list fa-2x"></i>`,
                content: `
                    <x-yield>products</x-yield>
                `,
                // We want to activate it once dropped in the canvas.
                activate: true,
                // select: true, // Default with `activate: true`
                category: "Content"
            }, {
                id: 'categories',
                label: 'Categories',
                media: `<i class="bi bi-tags fa-2x"></i>`,
                content: `
                    <x-yield>categories</x-yield>
                `,
                // We want to activate it once dropped in the canvas.
                activate: true,
                // select: true, // Default with `activate: true`
                category: "Content"
            }, {
                id: 'categories2',
                label: 'Categories2',
                media: `<i class="bi bi-tags fa-2x"></i>`,
                content: `
                    <x-yield>categories2</x-yield>
                `,
                // We want to activate it once dropped in the canvas.
                activate: true,
                // select: true, // Default with `activate: true`
                category: "Content"
            }

        ]
    },
    layerManager: {
        appendTo: '.layers-container'
    },
    // We define a default panel as a sidebar to contain layers
    panels: {
        defaults: [{
            id: 'layers',
            el: '.panel__right',
            // Make the panel resizable
            resizable: {
                maxDim: 350,
                minDim: 200,
                tc: 0, // Top handler
                cl: 1, // Left handler
                cr: 0, // Right handler
                bc: 0, // Bottom handler
                // Being a flex child we need to change `flex-basis` property
                // instead of the `width` (default)
                keyWidth: 'flex-basis',
            },
        },
        {
            id: 'panel-switcher',
            el: '.panel__switcher',
            buttons: [{
                id: 'show-blocks',
                active: true,
                label: 'Blocks',
                command: 'show-blocks',
                // Once activated disable the possibility to turn it off
                togglable: false,
            }, {
                id: 'show-layers',
                active: true,
                label: 'Layers',
                command: 'show-layers',
                // Once activated disable the possibility to turn it off
                togglable: false,
            }, {
                id: 'show-style',
                active: true,
                label: 'Styles',
                command: 'show-styles',
                togglable: false,
            }],
        }
        ]
    },
    // The Selector Manager allows to assign classes and
    // different states (eg. :hover) on components.
    // Generally, it's used in conjunction with Style Manager
    // but it's not mandatory
    selectorManager: {
        appendTo: '.styles-container'
    },
    styleManager: {
        appendTo: '.styles-container',
        sectors: [{
            name: 'General',
            open: false,
            buildProps: ['float', 'display', 'position', 'top', 'right', 'left', 'bottom']
        }, {
            name: 'Typography',
            open: false,
            buildProps: ['font-family', 'font-size', 'font-weight', 'letter-spacing', 'color', 'line-height', 'text-align', 'text-shadow']
        }, {
            name: 'Dimension',
            open: false,
            // Use built-in properties
            buildProps: ['width', 'min-height', 'padding', 'margin'],
            // Use `properties` to define/override single property
            properties: [
                {
                    // Type of the input,
                    // options: integer | radio | select | color | slider | file | composite | stack
                    type: 'integer',
                    name: 'The width', // Label for the property
                    property: 'width', // CSS property (if buildProps contains it will be extended)
                    units: ['px', '%'], // Units, available only for 'integer' types
                    defaults: 'auto', // Default value
                    min: 0, // Min value, available only for 'integer' types
                },
            ]
        }, {
            name: 'Decoration',
            open: false,
            buildProps: ['border-radius-c', 'background-color', 'border-radius', 'border', 'box-shadow', 'background'],
        }, {
            name: 'Extra',
            open: false,
            buildProps: ['opacity', 'transition', 'perspective', 'transform'],
            properties: [{
                type: 'slider',
                property: 'opacity',
                defaults: 1,
                step: 0.01,
                max: 1,
                min: 0,
            }
            ]
        },]
    },
});

editor.Panels.addPanel({
    id: 'panel-top',
    el: '.panel__top',
});
editor.Panels.addPanel({
    id: 'basic-actions',
    el: '.panel__basic-actions',
    buttons: [
        {
            id: 'visibility',
            active: true, // active by default
            className: 'btn-toggle-borders',
            label: '<u>B</u>',
            command: 'sw-visibility', // Built-in command
        }, {
            id: 'export',
            className: 'btn-open-export',
            label: 'Exp',
            command: 'export-template',
            context: 'export-template', // For grouping context of buttons from the same panel
        }, {
            id: 'show-json',
            className: 'btn-show-json',
            label: 'JSON',
            context: 'show-json',
            command(editor) {
                editor.Modal.setTitle('Components JSON')
                    .setContent(`<textarea style="width:100%; height: 250px;">
            ${JSON.stringify(editor.getComponents())}
          </textarea>`)
                    .open();
            },
        }, {
            id: 'export-blade',
            className: 'btn-export-template',
            label: 'Export',
            context: 'export-blade',
            command(editor) {
                const form = document.getElementById('template-save-form');

                if (form !== null) {
                    const componentsElem = form.querySelector('[name="components"]');
                    const htmlElem = form.querySelector('[name="html"]');
                    const cssElem = form.querySelector('[name="css"]');

                    if (componentsElem !== null && htmlElem !== null && cssElem !== null) {
                        const components = JSON.stringify(editor.getProjectData());
                        componentsElem.value = components;
                        htmlElem.value = editor.getHtml();
                        cssElem.value = editor.getCss();
                        form.submit();

                        return;
                    }
                }

                console.error('Unknown form save-from');
            },
        }
    ],
});

editor.on('run:export-template:before', opts => {
    console.log('Before the command run', opts);
    if (0 /* some condition */) {
        opts.abort = 1;
        console.log(editor.getRules());
    }
});
editor.on('run:export-template', () => console.log('After the command run'));
editor.on('abort:export-template', () => console.log('Command aborted'));

//Panal switcher command
editor.Commands.add('show-blocks', {
    getRowEl(editor) { return editor.getContainer().closest('.editor-row'); },
    getBlocksEl(row) { return row.querySelector('.blocks-container') },

    run(editor, sender) {
        const lmEl = this.getBlocksEl(this.getRowEl(editor));
        lmEl.style.display = '';
    },
    stop(editor, sender) {
        const lmEl = this.getBlocksEl(this.getRowEl(editor));
        lmEl.style.display = 'none';
    },
});

editor.Commands.add('show-layers', {
    getRowEl(editor) { return editor.getContainer().closest('.editor-row'); },
    getLayersEl(row) { return row.querySelector('.layers-container') },

    run(editor, sender) {
        const lmEl = this.getLayersEl(this.getRowEl(editor));
        lmEl.style.display = '';
    },
    stop(editor, sender) {
        const lmEl = this.getLayersEl(this.getRowEl(editor));
        lmEl.style.display = 'none';
    },
});
editor.Commands.add('show-styles', {
    getRowEl(editor) { return editor.getContainer().closest('.editor-row'); },
    getStyleEl(row) { return row.querySelector('.styles-container') },

    run(editor, sender) {
        const smEl = this.getStyleEl(this.getRowEl(editor));
        smEl.style.display = '';
    },
    stop(editor, sender) {
        const smEl = this.getStyleEl(this.getRowEl(editor));
        smEl.style.display = 'none';
    },
});

