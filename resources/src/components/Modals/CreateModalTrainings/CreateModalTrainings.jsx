import React from 'react';
import { Button, Modal } from 'react-bootstrap';

export default function CreateModalTrainings(props) {
    const {show, setShow} = props;
    const handleClose = () => setShow(false);

    return (
        <Modal show={show} onHide={handleClose} centered size='lg'>
            <Modal.Header>
                <Modal.Title>Crear Capacitacion</Modal.Title>
            </Modal.Header>

            <Modal.Body>
                <h1>Crear Capacitacion</h1>
            </Modal.Body>

            <Modal.Footer>
                <Button variant="secondary" onClick={handleClose}>Cancelar</Button>
                <Button variant="success" onClick={handleClose}>Crear</Button>
            </Modal.Footer>
        </Modal>
    )
}
