"use client";

import "../../../app/i18n"; // ✅ هذا السطر ضروري لتفعيل i18next قبل الاستخدام
import { useTranslation } from "react-i18next";
import { useEffect, useState } from "react";
import Container from "react-bootstrap/Container";
import Nav from "react-bootstrap/Nav";
import Navbar from "react-bootstrap/Navbar";
import NavDropdown from "react-bootstrap/NavDropdown";
import Link from "next/link";
import Categories from "../../Categories/Categories";
import("bootstrap/dist/js/bootstrap.bundle.min.js");

export default function NavBar() {
  const t = useTranslation();
  const { i18n } = useTranslation();
  const currentLanguage = i18n.language;
  const [home, setHome] = useState("");
  const [language, setLanguage] = useState("");

  useEffect(() => {
    switch (currentLanguage) {
      case "ar":
        setHome("الرئيسية");
        setLanguage('اللغة')
        break;
      case "fr":
        setHome("Kieli");
        break;
      default:
        setHome("Home");
        setLanguage('Language')
    }
  }, [currentLanguage]);

  return (
    <Navbar id="navbar" expand="lg" className="shadow-sm">
      <Container className="mx-auto d-flex justify-content-center">
        <Navbar.Toggle aria-controls="basic-navbar-nav" className="ms-auto" />
        <Navbar.Collapse id="basic-navbar-nav">
          <Nav className="d-flex justify-content-center w-100 align-items-center">
            <Nav.Link as={Link} href="/" className="fw-semibold">
              {home}
            </Nav.Link>

            <Categories />

            <NavDropdown
              title={language}
              align={currentLanguage === "ar" ? "end" : "start"}
            >
              <NavDropdown.Item
                onClick={() => i18n.changeLanguage("en")}
                active={currentLanguage === "en"}
              >
                English
              </NavDropdown.Item>
              <NavDropdown.Item
                onClick={() => i18n.changeLanguage("ar")}
                active={currentLanguage === "ar"}
              >
                العربية
              </NavDropdown.Item>
              <NavDropdown.Item
                onClick={() => i18n.changeLanguage("fr")}
                active={currentLanguage === "fr"}
              >
                Français
              </NavDropdown.Item>
            </NavDropdown>
          </Nav>
        </Navbar.Collapse>
      </Container>
    </Navbar>
  );
}
