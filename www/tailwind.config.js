module.exports = {
  purge: [
    'resources/views/**/*.blade.php'
  ],
  darkMode: 'media', // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    flex: [],
    fontSize: ['hover'],
    
    extend: {},
  },
  plugins: [],
  corePlugins: [
    'preflight',
    'container',

    'margin',
    'padding',
    'width',
    'height',

    'minHeight',
    'minWidth',

    'backgroundColor',

    'alignContent',
    'alignItems',
    'justifyContent',
    'justifyItems',
    'justifySelf',
    'verticalAlign',

    'boxShadow',

    'borderColor',
    'borderRadius',
    'borderWidth',

    'overflow',

    'gridTemplateColumns',
    'gridTemplateRows',

    'cursor',

    'display',
    'position',
    'inset',

    'flex',
    // 'flexDirection',
    // 'flexGrow',
    // 'flexShrink',
    // 'flexWrap',

    'fontFamily',
    'fontSize',
    'fontStyle',
    'fontWeight',

    'textAlign',
    'textDecoration',
    'textColor',
    'fontSmoothing'
  ]
}
