import React from 'react';
import { faMoneyCheckAlt, faDollyFlatbed, faHandHoldingUsd, faChartPie, faBell } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { NavLink } from 'react-router-dom';
import {controles} from '../../utils/funciones.js';

export default function GDAdminFinanLinks() {
    return (
        <>
            <NavLink exact to={'/functions/gdAdminFinan/pagos'} activeClassName='active' onClick={controles}>
                <FontAwesomeIcon icon={faMoneyCheckAlt} />
                Ver Pagos
            </NavLink>

            <NavLink exact to={'/functions/gdAdminFinan/productos'} activeClassName='active' onClick={controles}>
                <FontAwesomeIcon icon={faDollyFlatbed} />
                Ver Productos
            </NavLink>

            <NavLink exact to={'/functions/gdAdminFinan/ventas'} activeClassName='active' onClick={controles}>
                <FontAwesomeIcon icon={faHandHoldingUsd} />
                Ver Ventas
            </NavLink>

            <NavLink exact to={'/functions/gdAdminFinan/reportes'} activeClassName='active' onClick={controles}>
                <FontAwesomeIcon icon={faChartPie} />
                Ver Reportes
            </NavLink>

            <NavLink exact to={'/functions/notificaciones'} activeClassName='active' onClick={controles}>
                <FontAwesomeIcon icon={faBell} />
                Notificaciones
            </NavLink>
        </>
    )
}
