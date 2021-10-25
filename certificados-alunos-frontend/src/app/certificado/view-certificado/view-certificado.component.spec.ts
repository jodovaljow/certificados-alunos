import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewCertificadoComponent } from './view-certificado.component';

describe('ViewCertificadoComponent', () => {
  let component: ViewCertificadoComponent;
  let fixture: ComponentFixture<ViewCertificadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ ViewCertificadoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewCertificadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
