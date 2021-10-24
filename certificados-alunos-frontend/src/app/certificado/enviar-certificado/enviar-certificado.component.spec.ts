import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EnviarCertificadoComponent } from './enviar-certificado.component';

describe('EnviarCertificadoComponent', () => {
  let component: EnviarCertificadoComponent;
  let fixture: ComponentFixture<EnviarCertificadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EnviarCertificadoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EnviarCertificadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
