/// <reference types="cypress"/>

describe('Prueba la navegación y routing del header y footer',()=>{
    it('navegacion del header',()=>{
        cy.visit('/');
        cy.get('[data-cy="navegacion-header"]').should('exist');
        cy.get('[data-cy="navegacion-header"]').find('a').should('have.length',5);
        cy.get('[data-cy="navegacion-header"]').find('a').should('not.have.length',4);
        //Revisar si los enlaces son correctos
        cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('attr','href').should('equal','/nosotros')
        cy.get('[data-cy="navegacion-header"]').find('a').eq(0).invoke('text').should('equal','Nosotros')

        cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('attr','href').should('equal','/propiedades')
        cy.get('[data-cy="navegacion-header"]').find('a').eq(1).invoke('text').should('equal','Propiedades')

        cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('attr','href').should('equal','/blogAll')
        cy.get('[data-cy="navegacion-header"]').find('a').eq(2).invoke('text').should('equal','Blog')

        cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('attr','href').should('equal','/contacto')
        cy.get('[data-cy="navegacion-header"]').find('a').eq(3).invoke('text').should('equal','Contacto')

        cy.get('[data-cy="navegacion-header"]').find('a').eq(4).invoke('attr','href').should('equal','/login')
        cy.get('[data-cy="navegacion-header"]').find('a').eq(4).invoke('text').should('equal','Iniciar Sesión')
        
    });

    it('navegacion del footer',()=>{
        cy.get('[data-cy="navegacion-footer"]').should('exist');
        cy.get('[data-cy="navegacion-footer"]').should('have.prop','class').should('equal','navegacion');
        cy.get('[data-cy="navegacion-footer"]').find('a').should('have.length',5);
        cy.get('[data-cy="navegacion-footer"]').find('a').should('not.have.length',4);
        //Revisar si los enlaces son correctos
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('attr','href').should('equal','/')
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(0).invoke('text').should('equal','Inicio')

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('attr','href').should('equal','/nosotros')
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(1).invoke('text').should('equal','Nosotros')

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('attr','href').should('equal','/propiedades')
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(2).invoke('text').should('equal','Propiedades')

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('attr','href').should('equal','/blogAll')
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(3).invoke('text').should('equal','Blog')

        cy.get('[data-cy="navegacion-footer"]').find('a').eq(4).invoke('attr','href').should('equal','/contacto')
        cy.get('[data-cy="navegacion-footer"]').find('a').eq(4).invoke('text').should('equal','Contacto')

        cy.get('[data-cy="copy"]').should('have.prop','class').should('equal','copy');

    });
});