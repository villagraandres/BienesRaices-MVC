/// <reference types="cypress"/>

describe('Formulario de contacto',()=>{
    it('Prueba la pagina y el vio de emails',()=>{
        cy.visit('/contacto');
        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal','Contacto')
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal','Formulario de Contacto')

        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal','Llene el formulario de Contacto')
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal','Formulario de Contacto')

        cy.get('[data-cy="formulario-contacto"]').should('exist');
    });

    it('Llena los campos del formulario',()=>{
        cy.get('[data-cy="input-nombre"]').type('Pedro')
        cy.get('[data-cy="input-mensaje"]').type('Deseo comprar una casa');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-presupuesto"]').type('2999');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();

        cy.wait(3000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();

        cy.get('[data-cy="input-telefono"]').type('121212');
        cy.get('[data-cy="input-fecha"]').type('2022-04-10');
        cy.get('[data-cy="input-hora"]').type('12:30');

        cy.get('[data-cy="formulario-contacto"]').submit();
        cy.get('[data-cy="alerta-envio"]').should('exist');
        cy.get('[data-cy="alerta-envio"]').invoke('text').should('equal','Mensaje enviado correctamente');
        cy.get('[data-cy="alerta-envio"]').should('have.class','alerta').and('have.class','exito')
    });
});