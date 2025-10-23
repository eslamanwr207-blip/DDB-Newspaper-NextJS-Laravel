import Categories from "../../Categories/Categories";
import Contuct from "../Contuct/Contuct";
import './Footer.css';

import Container from 'react-bootstrap/Container';


export default function Footer(){
    return(
        <Container>
            <div className="Footer" >
            <h1 className="logo" >DDB</h1>
            <Categories/>
            <Contuct/>

            <p>Copyright 2025 DDB. All rights reserved.  The DDB is not responsible for the content of external sites</p>
        </div>

        </Container>
    )
}