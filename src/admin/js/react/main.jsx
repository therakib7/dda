// import React from 'react';
// import ReactDOM from 'react-dom';
const { render } = wp.element;
import App from './App';

document.addEventListener( 'DOMContentLoaded', function() {
    let element = document.getElementById( 'exdda-admin-app' );
    if( typeof element !== 'undefined' && element !== null ) {
        render( <App />, document.getElementById( 'exdda-admin-app' ) );
    }
} ) 