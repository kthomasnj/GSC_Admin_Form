function Header_Template() {
    class Header extends HTMLElement {
        constructor() {
            super();
            this.attachShadow({ mode: 'open' });
            this.shadowRoot.innerHTML = `
                    <style>
                        nav {
                        height: 48px;
                        display: flex;
                        align-items: center;
                        justify-content: left;
                        background-color: transparent;
                        color: white;
                        font-family: sans-serif;
                        }

                        topbar{
                            height: 40px;
                            display: flex;
                            background-color: #33165e;
                            color: white;
                            font-family: sans-serif;
                        }

                    </style>
                    
                    

                    <header>
                        <topbar>
                            <img src="images/gsc.png" style="position: absolute; top: 1; left: 0;" >
                        </topbar>
                        <br><br>
                        <nav>
                            <img src="images/header.jpg" style="position: absolute; top: 1; width: 99%; height: 10vh;" >
                            <h2 id="headerTitle" style="position: absolute; top: 1; right: 5%"; color: white;>Request Form</h2>
                        </nav>
                        <br>
                        
                    </header>`; 
        }
    }
   //Register header
   window.customElements.define('header-component', Header);   
   
   class Footer extends HTMLElement {
    constructor() {
        super();
        this.attachShadow({ mode: 'open' });
        this.shadowRoot.innerHTML = `
                <style>
                    nav {
                    margin-bottom: 0;
                    height: 40px;
                    width: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    background-color: #33165e;
                    color: white;
                    position: fixed;
                    left: 0;
                    bottom: 0;
                    text-align: center
                    font-family: sans-serif;
                    }
                    
                </style>

                <footer>
                        <nav>
                           
                        </nav>
                </footer>`; 
    }
}
//Register footer
window.customElements.define('footer-component', Footer);
}