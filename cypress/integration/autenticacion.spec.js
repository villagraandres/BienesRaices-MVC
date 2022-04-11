/// <reference types="cypress"/>

describe('probar la autenticacion',()=>{
    it('autenticacion en /login',()=>{
        cy.visit('/login');

        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').should('have.text','Iniciar Sesión')

        cy.get('[data-cy="formulario-login"]').should('exist');

        //Los campos son oblogatorios
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[ data-cy="alerta-login"]').should('exist');
        cy.get('[ data-cy="alerta-login"]').eq(0).should('have.class','error')
        cy.get('[ data-cy="alerta-login"]').eq(0).should('have.text','El Email del usuario es obligatorio')
        cy.get('[ data-cy="alerta-login"]').eq(1).should('have.class','error')
        cy.get('[ data-cy="alerta-login"]').eq(1).should('have.text','El Password del usuario es obligatorio')
        //Que el usuario exista

        //Verificar la contraseña
    });
})