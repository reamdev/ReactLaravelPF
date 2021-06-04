import React from 'react';
import { Button, Modal } from 'react-bootstrap';

export default function CreateModalSales(props) {
    const {show, setShow} = props;
    const handleClose = () => setShow(false);

    return (
        <Modal show={show} onHide={handleClose} centered size='lg'>
            <Modal.Header>
                <Modal.Title>Crear Venta</Modal.Title>
            </Modal.Header>

            <Modal.Body>
                <h1>Creando Venta</h1>
            </Modal.Body>

            <Modal.Footer>
                <Button variant="secondary" onClick={handleClose}>Cancelar</Button>
                <Button variant="success" onClick={handleClose}>Crear</Button>
            </Modal.Footer>
        </Modal>
    )
}
