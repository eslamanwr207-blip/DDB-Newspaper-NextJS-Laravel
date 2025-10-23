import { Facebook, Twitter, Instagram, Linkedin, Youtube } from "react-bootstrap-icons";

import './Contuct.css';


export default function Contuct(){
    return(
        <div className="Contuct" >
            <a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
        <Facebook color="#1877F2" />
        </a>
        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer">
            <Twitter color="#1DA1F2" />
        </a>
        <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
            <Instagram color="#E4405F" />
        </a>
        <a href="https://linkedin.com" target="_blank" rel="noopener noreferrer">
            <Linkedin color="#0A66C2" />
        </a>
        <a href="https://youtube.com" target="_blank" rel="noopener noreferrer">
            <Youtube color="#FF0000" />
        </a>
        </div>
    )
}